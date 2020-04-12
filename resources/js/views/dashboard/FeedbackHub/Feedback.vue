<template>
    <div class=" feedback-form">
        <div class="">
            <h3>A penny for your thoughts</h3>
        </div>
        <div class="">
            <h4>What do you want to see in the app?</h4>
        </div>
        <div class="">
            <form @submit.prevent="sendEmail">
                <div class="flex">
                    <div class="fieldset1 fieldset">
                        <h1>Type</h1>
                        <label>
                            <select v-model="feedbackType" class="full-width">
                                <option v-for="opt in feedbackTypes" :value="opt.value" :key="opt.value">
                                    {{opt.text}}
                                </option>
                            </select>
                        </label>
                    </div>
                    <div class="fieldset2 fieldset">
                        <h1>Tittle</h1>
                        <label for="tittle"/><input class="full-width" type="text" id="tittle" name="tittle"
                                                    placeholder="Create Offers"/>
                    </div>
                </div>
                <div>
                    <div class="fieldset">
                        <h1>Description</h1>
                        <label for="desc"/><textarea rows="5" class="full-width"
                                                     placeholder="Insert functions, benefits, etc." id="desc"
                                                     name="description"/>
                    </div>
                </div>
                <div>
                    <input type="submit" class="submit" value="Send Feedback"/>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import emailjs from 'emailjs-com';

    export default {
        name: "feedback",
        data: function () {
            return {
                feedbackType: 'featureRequest',
                feedbackTypes: [
                    {text: "Feature request", value: "featureRequest"},
                    {text: "Feature improvement", value: "featureImprovement"},
                    {text: "Performance issues", value: "perfIssues"},
                    {text: "Pricing", value: "pricing"},
                    {text: "UX", value: "ux"}
                ]
            }
        },
        methods: {
            sendEmail: (e) => {
                emailjs.sendForm('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', e.target, 'YOUR_USER_ID')
                    .then((result) => {
                        console.log('SUCCESS!', result.status, result.text);
                    }, (error) => {
                        console.log('FAILED...', error);
                    });
            },
        }
    };
</script>
<style lang="scss">
    .feedback-form {
        padding: 4% 6%;
        background-color: white;
        border-radius: 6px;
        margin-bottom: 50px;
    }

    .flex {
        display: flex;
    }

    .fieldset1 {
        max-width: 30%;
        margin-right: 11px;
    }

    .fieldset2 {
        width: 70%;
    }

    .full-width {
        width: 100%;
        border: none;
        border-radius: 6px;

        textarea {

        }
    }
    .fieldset {
        border: 2px groove threedface;
        border-top: none;
        padding: 0.5em;
        margin: 1em 2px;
        border-radius: 7px;
    }

    .fieldset>h1 {
        font: 1em normal;
        margin: -1em -0.5em 0;
        position: relative;
    }

    .fieldset>h1>span {
        float: left;
    }

    .fieldset>h1:before {
        border-top: 2px groove threedface;
        content: ' ';
        float: left;
        margin: 0.5em 2px 0;
        width: 0.75em;
        border-radius: 6px;
    }

    .fieldset>h1:after {
        position: absolute;
        top: 7px;
        right: 1px;
        border-top: 2px groove ButtonFace;
        content: " ";
        width: 70%;
        border-top: 2px groove threedface;
    }
</style>