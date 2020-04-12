<template>
    <div class="dashboard">
        <div class="container-header">
            <h1 class="text-bold">Hello, Toan</h1>
            <p>demo.bigcommerce.com</p>
            <div class="chatbox-above">
                <i class="fa fa-cab padding-l-15"/>
                <p class="padding-l-15">Help us build your dream product and gain life time benefits</p>
                <el-button-group class="ml-lg-auto padding-7">
                    <el-button class="btn-chat-now">Chat now</el-button>
                    <el-button class="btn-transparent"><i class="el-icon-close"/></el-button>
                </el-button-group>
            </div>
        </div>
        <div class="dashboard-body">
            <div class="left-dashboard-container">
                <div class="welcome-section">
                    <h1 class="welcome-text">Welcome to</h1>
                    <h1 class="welcome-text">Peasi Native Upsell</h1>
                    <p>Your feedback are very important because they help us to serve your needs better. Your
                        satisfaction is our number one concern.</p>
                </div>
                <Feedback/>
            </div>
            <div class="right-dashboard-container">
                <div class="block-dashboard">
                    <div class="text-above">Find a solution for your problem with Peasisoft tutorials.</div>
                    <div class="clickable">
                        <i class="el-icon-apple"/>
                        <span>See documents</span>
                        <i class="el-icon-arrow-right float-right"/>
                    </div>
                </div>
                <div class="block-dashboard">
                    <div class="text-above">Guide us building your dream product, and gain life time benefits</div>
                    <div class="clickable">
                        <i class="el-icon-apple"/>
                        <span>Start a conversation</span>
                        <i class="el-icon-arrow-right float-right"/>
                    </div>
                </div>
                <Notification/>
            </div>
        </div>
    </div>
</template>
<script>
    import Feedback from "./FeedbackHub/feedback";
    import Notification from "./notification.vue";

    export default {
        name: "dashboard",
        components: {Notification, Feedback},
        data() {
            return {}
        }
    }
</script>
<style lang="scss">
    .dashboard {
        padding: 0 8% 0 5%;

        .dashboard-body {
            display: flex;
        }
    }

    .left-dashboard-container {
        width: 60%;
    }

    .right-dashboard-container {
        width: 40%;
    }

    .ml-lg-auto {
        margin-left: auto;
    }

    .padding-l-15 {
        padding-left: 15px;
        line-height: 40px;
    }

    .btn-transparent {
        border: none;
        background: transparent;
        margin-top: -7px;
    }

    .btn-chat-now {
        padding: 5px 30px;
        border-radius: 6px !important;
        border: none;
        background: linear-gradient(90deg, #00C5E0 0%, #00E0D3 100%);
    }

    .chatbox-above {
        line-height: 40px;
        height: 40px;
        color: white;
        display: flex;
        border-radius: 6px;
        background: linear-gradient(206.11deg, #7763ED 3.83%, #462BD9 96.26%);
    }

    .welcome-section {
        background: linear-gradient(114.67deg, #1A4151 23.23%, #254F61 72.1%);
        border-radius: 10px;
        margin: 15px 0;
        padding: 10px 20px 15px;

        p {
            color: #77B3CB;
            max-width: 60%;
        }
    }

    .welcome-text {
        color: white;
    }

    .block-dashboard {
        padding: 15px;
        margin: 15px 0 15px 15px;
        background-color: white;
        border-radius: 10px;
        color: #061325;

        .text-above {
            margin: 10px 0;
        }

        .clickable {
            margin: 10px 0;
            font-size: 16px;
        }
    }

    .float-right {
        float: right;
    }
</style>