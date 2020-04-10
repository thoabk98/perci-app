<template>
    <div class="container">
        <div class="row">
            <h1>A penny for your thoughts</h1>
        </div>
        <div class="row">
            <h4>What do you want to see in the app?</h4>
        </div>
        <div class="row input-container">
            <form action="">
                <div>
                    <fieldset>
                        <legend>Type</legend>
                        <label>
                            <select v-model="feedbackType">
                                <option v-for="opt in feedbackTypes" v-bind="opt.value">
                                    {{opt.text}}
                                </option>
                            </select>
                        </label>
                    </fieldset>
                    <fieldset>
                        <legend>Tittle</legend>
                        <label for="tittle"/><input type="text" id="tittle" name="tittle"
                                                    placeholder="Create Offers"/>
                    </fieldset>
                </div>
                <div>
                    <fieldset>
                        <legend>Description</legend>
                        <label for="desc"/><textarea placeholder="Insert functions, benefits, etc." id="desc"
                                                     name="description"/>
                    </fieldset>
                </div>
                <div>
                    <input type="button">
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    export default {
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
    };
</script>