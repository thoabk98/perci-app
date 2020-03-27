<template>
  <div ref="offerList">
    <div class="content-header">
      <div class="row">
        <div class="col-xs-12">
          <h2>Manage offers</h2>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="row">
        <div class="col-xs-7">
          <el-button class="create-new-btn" @click="gotoEdit"
            >Create new &nbsp;&nbsp;&nbsp;&nbsp;<span>+</span></el-button
          >
        </div>
        <div class="col-xs-5">
          <template>
            <el-input
              v-model="search"
              prefix-icon="el-icon-search"
              placeholder="Type to search"
              clearable
            />
          </template>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-xs-12">
          <div class="box round-edge-box">
            <div class="box-body">
              <el-tabs v-model="activeName" @tab-click="handleClick">
                <el-tab-pane label="Offers" name="offer">
                  <OfferListTable :offers="offers"></OfferListTable>
                </el-tab-pane>
                <el-tab-pane label="Groups" name="group">
                  <OfferGroupList v-if="!groupUpdate"></OfferGroupList>
                  <Group v-if="groupUpdate" :groupInfo="group"></Group>
                </el-tab-pane>
              </el-tabs>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div>
      <el-dialog title="Create new group" :visible.sync="newGroup" width="25%">
        <div class="input-wrapper">
          <span class="input-title">Group's name</span>
          <el-input
            placeholder="Group's name"
            v-model="groupName"
            prefix-icon="el-icon-folder-opened"
            suffix-icon="el-icon-edit-outline"
            size="medium"
          ></el-input>
        </div>
        <span slot="footer" class="dialog-footer">
          <el-button @click="cancelCreateGroup" size="medium">Cancel</el-button>
          <el-button type="primary" @click="applyCreateGroup" size="medium"
            >Apply</el-button
          >
        </span>
      </el-dialog>
    </div>
  </div>
</template>

<script>
import OfferGroupList from "./OfferGroupList.vue";
import OfferListTable from "./OfferListTable.vue";
import Group from "./updateGroup/Group.vue";

export default {
  data() {
    return {
      offers: null,
      total: 20,
      search: "",
      activeName: "offer",
      newGroup: false,
      groupName: "",
      groupUpdate: false,
      group: []
    };
  },
  components: {
    OfferGroupList,
    OfferListTable,
    Group
  },
  methods: {
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
      console.log(index, row);
    },
    handleClick(obj, e) {
      this.activeName = obj.name;
    },
    cancelCreateGroup() {
      this.newGroup = false;
    },
    applyCreateGroup() {
      this.$emit("newGroup", this.groupName);
      this.newGroup = false;
      this.groupName = "";
    },
    gotoEdit() {
      if (this.activeName === "offer") this.$router.push({ name: "offer.new" });
      else if (this.activeName === "group") this.newGroup = true;
    },
    updateGroup() {
      return this.groupId !== null;
    }
  },
  created() {
    this.$root.$on("openUpdateGroup", object => {
      if (object) {
        this.groupUpdate = true;
        this.group = object;
      }
    });

    this.$root.$on("groupUpdateDone", object => {
      this.groupUpdate = false;
      this.group = [];
    });
  }
};
</script>

<style lang="scss">
.round-edge-box {
  border-radius: 10px;
}

.create-new-btn {
  background: #4c5b75;
  color: white;
  border-radius: 6px;
}

.text-secondary {
  color: #7f8fa4;
}

.offer-name {
  color: #072856;
  font-weight: bold;
}

.submenu-wrapper {
  cursor: pointer;
  position: relative;
  float: right;
  .submenu {
    display: none;
  }
  &:hover {
    .submenu {
      position: absolute;
      display: block;
      top: -10px;
      left: -60px;
      list-style: none;
      padding: 10px;
      background-color: #273148;
      border-radius: 5px;
      z-index: 1;
      &:before {
        content: "";
        position: absolute;
        top: 20%;
        left: 40px;
        margin-top: -5px;
        border: 10px solid transparent;
        border-left: 15px solid #273148;
      }
      .submenu-item {
        color: #fff;
        .submenu-link {
          color: #fff;
        }
      }
    }
  }
}

.el-dialog__wrapper {
  .el-dialog__header {
    .el-dialog__title {
      font-weight: bold;
      font-size: 24px;
    }
  }

  .el-dialog {
    border-radius: 5px;
  }

  .el-dialog__body {
    padding: 10px 10px;
  }

  .input-wrapper {
    position: relative;
    .input-title {
      position: absolute;
      background-color: #fff;
      z-index: 1;
      padding: 0 10px;
      left: 20px;
      top: 4px;
    }
    .el-input {
      padding-top: 1.5rem;
      padding-bottom: 2rem;
      & /deep/ .el-input__inner {
        border-radius: 6px;
        border-color: #000;
        padding: 1.5rem 15px 1rem;
        font-size: 16px;
        height: 45px;
        padding-left: 10%;
      }
      .el-input__prefix {
        font-size: 20px;
        position: absolute;
        right: 90%;
      }
      .el-input__suffix {
        font-size: 20px;
      }
    }
  }
}
</style>
