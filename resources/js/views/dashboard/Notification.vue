<template>
    <div class="notifications-section">
        <h1>Notifications</h1>
        <div v-for="notification in Notifications" :key="notification.id">
            <i class="el-icon-apple"/>
            {{notification.message}}
        </div>
    </div>
</template>

<script>
    export default {
        name: "notification.vue",
        data: function () {
            return{
                Notifications: [
                    {id: 1, message: "This is demo notifications", isRead: false},
                    {id: 2, message: "This is demo notifications", isRead: false},
                    {id: 3, message: "This is demo notifications", isRead: false},
                    {id: 4, message: "This is demo notifications", isRead: false}
                ],
            }
        }
    }
</script>
<style lang="scss">
    .notifications-section{
        border-radius: 10px;
        background-color: white;
        margin: 15px 0 15px 15px;
        padding: 5px 15px 15px;
    }
</style>
