<template>
  <div>
    <el-card class="box-card">
      <div class="row">
        <div class="col-md-6">
          <span class="group-title">Group Info</span>
        </div>
        <div class="col-md-6">
          <el-switch
            class="group-status"
            :value="status"
            @change="changeStatus()"
            active-color="#13ce66"
            inactive-text="Status"
          >
          </el-switch>
        </div>
      </div>
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
      <div class="row">
        <div class="col-md-8">
          <span><i class="el-icon-date"></i> Set a Date Range</span>
        </div>
        <div class="col-md-4">
          <el-checkbox v-model="setDate" style="float: right"></el-checkbox>
        </div>
      </div>
      <div v-if="setDate">
        <div class="input-wrapper">
          <span class="input-title">
            Start Date
          </span>
          <el-date-picker
            v-model="startDate"
            type="date"
            placeholder="Select date and time"
            :picker-options="pickerOptions"
          >
          </el-date-picker>
        </div>
        <div class="input-wrapper">
          <span class="input-title">
            End Date
          </span>
          <el-date-picker
            v-model="endDate"
            type="date"
            placeholder="Select date and time"
            :picker-options="pickerOptions"
          >
          </el-date-picker>
        </div>
        <p>Updating the group date will overide all the offers' date range</p>
      </div>
      <div class="row align-items-end">
        <div class="col-md-6 col-md-offset-1" style="margin-top: 10px">
          <el-button
            type="info"
            icon="el-icon-plus"
            class="action-btn"
            @click="addOfferPopup"
          >
            Add Offer
          </el-button>
        </div>
        <div class="col-md-4" style="margin-top: 10px">
          <el-button
            type="primary"
            class="action-btn"
            @click="showUpdateConfirm"
            >Update</el-button
          >
        </div>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      groupId: null,
      status: true,
      groupName: "",
      setDate: false,
      pickerOptions: {
        shortcuts: [
          {
            text: "Today",
            onClick(picker) {
              picker.$emit("pick", new Date());
            }
          },
          {
            text: "Yesterday",
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24);
              picker.$emit("pick", date);
            }
          },
          {
            text: "A week ago",
            onClick(picker) {
              const date = new Date();
              date.setTime(date.getTime() - 3600 * 1000 * 24 * 7);
              picker.$emit("pick", date);
            }
          }
        ]
      },
      startDate: null,
      endDate: null
    };
  },
  methods: {
    changeStatus() {
      this.status = this.status ? false : true;
    },
    addOfferPopup() {
      this.$parent.$emit("addOfferDialogVisible", true);
    },
    showUpdateConfirm() {
      this.$confirm("Are you sure you want to move this offer?", "Warning", {
        confirmButtonText: "OK",
        cancelButtonText: "Cancel",
        type: "warning"
      })
        .then(() => {
          this.$parent.$emit("updateGroup", true);
        })
        .catch(() => {
          this.$notify({
            message: "Update canceled"
          });
        });
    }
  },
  props: {
    groupInfo: {
      type: Object
    }
  },
  created() {
    this.$parent.$on("groupOfferUpdate", value => {
      let data = {
        name: this.groupName,
        status: this.status,
        start_date: this.startDate,
        end_date: this.endDate,
        offers: value
      };
      axios
        .put(`/api/groups/${this.groupId}`, data)
        .then(response => {
          this.$notify.success({
            title: "Success",
            message: response.data.message
          });
          this.$root.$emit("groupUpdateDone");
        })
        .catch(err => {
          this.$notify.error({
            title: "Error",
            message: err.response.data.message
          });
          this.$root.$emit("groupUpdateDone");
        });
    });
  },
  beforeMount() {
    this.groupId = this.groupInfo.id
    this.groupName = this.groupInfo.name;
    this.status = this.groupInfo.status === 1 ? true : false;
    this.startDate = this.groupInfo.start_date;
    this.endDate = this.groupInfo.end_date;
  }
};
</script>

<style lang="scss">
.box-card {
  border-radius: 10px;
}

.group-title {
  font-weight: bold;
  font-size: 24px;
}

.group-status {
  float: right;
  padding: 7% 0;
  .el-switch__label--left {
    font-weight: bold;
  }
}

.input-wrapper {
  position: relative;
  .input-title {
    position: absolute;
    background-color: #fff;
    z-index: 1;
    padding: 0 10px;
    left: 4%;
    top: 5%;
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
    .el-input__inner {
      padding-left: 15%;
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

.el-row {
  margin-bottom: 20px;
  &:last-child {
    margin-bottom: 0;
  }
}
.el-col {
  border-radius: 4px;
}
.bg-purple-dark {
  background: #99a9bf;
}
.bg-purple {
  background: #d3dce6;
}
.bg-purple-light {
  background: #e5e9f2;
}
.grid-content {
  border-radius: 4px;
  min-height: 36px;
}
.row-bg {
  padding: 10px 0;
  background-color: #f9fafc;
}
</style>
