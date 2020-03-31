<template>
  <div>
    <el-table
      :data="offers"
      height="430"
      style="width: 100%"
      column-gap="40px"
      id="group-list"
    >
      <el-table-column min-width="200" fixed="left">
        <template>
          <img
            src="https://via.placeholder.com/200x150.png"
            alt="https://via.placeholder.com/200x150.png"
          />
        </template>
      </el-table-column>
      <el-table-column label="Name" min-width="220" fixed="left">
        <template slot-scope="scope">
          <div>
            <p class="group-name">{{ scope.row.name }}</p>
            <div v-if="scope.row.startDate && scope.row.startDate">
              <p>{{ scope.row.startDate }} > {{ scope.row.endDate }}</p>
            </div>
          </div>
        </template>
      </el-table-column>
      <el-table-column prop="revenue" label="Revenue" width="120">
      </el-table-column>
      <el-table-column prop="impressions" label="Impressions" width="120">
      </el-table-column>
      <el-table-column prop="conversion" label="Conversion" width="120">
      </el-table-column>
      <el-table-column>
        <template slot-scope="scope">
          <el-button
            icon="el-icon-delete"
            circle
            @click="delete (scope.$index, scope.row)"
          ></el-button>
        </template>
      </el-table-column>
    </el-table>
    <el-dialog
      title="Choose offer"
      :visible.sync="addOfferDialogVisible"
      width="70%"
    >
      <div class="row">
        <div class="col-md-5">
          <div class="head">
            <h4 style="display: inline-block">Results</h4>
            <el-button type="text" style="float: right;">Select all</el-button>
          </div>
          <div
            class="wrapper results-wrapper"
            style="overflow:auto"
            v-infinite-scroll="load"
            infinite-scroll-disabled="disabled"
          >
            <div
              v-for="item in offer_list"
              :key="item.id"
              style="padding: 1rem 0;"
            >
              <img
                width="30"
                v-bind:src="item.image"
                style="vertical-align: super;"
              />
              <div
                style="width: 35%; display: inline-block; padding-left: 1rem; font-size: 18px"
              >
                <strong>{{ item.name }}</strong>
                <br /><strong>{{ item.group }}</strong>
              </div>
              <el-button
                style="float: right; padding: 1rem; margin-left: 1rem;"
                @click="addList(item, offer_list_choose, offer_list)"
                type="text"
              >
                ADD
              </el-button>
            </div>
            <p v-if="scroll_loading">Loading...</p>
          </div>
        </div>
        <div class="col-md-7">
          <div class="head">
            <h4 style="display: inline-block">Selected Offer</h4>
            <el-button style="float: right;" type="text">
              Remove all
            </el-button>
          </div>
          <div v-if="offer_list_choose.length" class="wrapper">
            <div
              style="padding: 1rem 0;"
              v-for="it in offer_list_choose"
              :key="it.id"
            >
              <div class="row">
                <div class="col-md-4 col-md-offset-1">
                  <img
                    width="350"
                    height="200"
                    v-bind:src="it.image"
                    style="vertical-align: super;"
                  />
                </div>
              </div>
              <div class="row">
                <div class="col-md-8 col-md-offset-1">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                      <strong>Trigger Location: </strong>
                    </div>
                    <div class="col-md-5">
                      {{ offerPosition(it.position) }}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-1">
                      <strong>Booster: </strong>
                    </div>
                    <div class="col-md-5">
                      None
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <el-button
                    style="float: right; padding: 1rem; margin-left: 1rem;"
                    type="text"
                    @click="addList(it, offer_list, offer_list_choose)"
                  >
                    <i class="el-icon-delete-solid"> </i>
                  </el-button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <span slot="footer" class="dialog-footer">
        <el-button @click="addOfferDialogVisible = false">Cancel</el-button>
        <el-button type="primary" @click="addOfferDialogVisible = false">
          Continue
        </el-button>
      </span>
    </el-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      offers: [],
      offer_list_choose: [],
      offer_list: [],
      page: 1,
      scroll_loading: false,
      total: 0,
      addOfferDialogVisible: false
    };
  },
  methods: {
    fetchGroupOffers() {
      axios
        .get("/api/groups/1/offers")
        .then(response => {
          this.offers = response.data;
        })
        .catch(err => {
          console.log(err);
        });
    },
    addList(object, listAdd, listRemove) {
      listAdd.push(object);
      var index = listRemove
        .map(x => {
          return x.id;
        })
        .indexOf(object.id);
      listRemove.splice(index, 1);
    },
    getListOffer(object = {}) {
      axios.get(`/api/offers?page=${object.page}`).then(response => {
        this.offer_list = this.offer_list.concat(response.data.data.data);
        this.total = response.data.data.total;
        this.page += 1;
        this.scroll_loading = false;
      });
    },
    load() {
      if (this.page > 1 && (this.page - 1) * 5 < this.total) {
        this.scroll_loading = true;
        this.getListOffer({
          page: this.page
        });
      }
    },
    offerPosition(pos) {
      const position = ["Add To Cart", "Before Checkout", "After Checkout"];

      return position[pos - 1];
    }
  },
  mounted() {
    this.fetchGroupOffers();
  },
  created() {
    this.$parent.$on("addOfferDialogVisible", value => {
      if (this.offer_list.length == 0) {
        this.getListOffer();
      }
      this.addOfferDialogVisible = value;
    });
    this.$parent.$on("updateGroup", value => {
      this.$parent.$emit("groupOfferUpdate", this.offer_list_choose);
    });
  },
  computed: {
    disabled() {
      return this.scroll_loading;
    }
  }
};
</script>

<style lang="scss">
#group-list {
  .cell {
    color: #072856;
    font-weight: bold;
    font-size: 16px;
    .group-name {
      font-size: 20px;
    }
  }
}

.el-dialog {
  padding: 0 10px;
  .head {
    padding: 3rem 0 2rem;
  }
  .wrapper {
    max-height: 300px;
    overflow-y: auto;
  }
  .el-input {
    & /deep/ .el-input__inner {
      border-radius: 6px;
      padding: 1rem 30px;
      font-size: 14px;
      height: 40px;
    }
  }
  .el-select {
    & /deep/ .el-input__inner {
      border-radius: 6px;
    }
  }
}

::-webkit-scrollbar {
  width: 4px; /* scroll bar width */
}

/* defines the inside shadow of the scroll bar track + rounded corners */
::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
  border-radius: 5px; /* the rounded corners of the background area of the scroll bar */
}

/* define the shadow inside the slider + rounded corners */
::-webkit-scrollbar-thumb {
  border-radius: 5px; /* the rounded corners of the scroll bar */
  -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
</style>
