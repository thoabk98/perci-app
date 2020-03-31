const Help = () => import("@/views/help/HelpCenter");
const FeatureRequest = () => import("@/views/help/FeatureRequest");

export default [
    {path: '/ult-upsell/help-center/', component: Help, name: 'help.index'},
    {path: '/ult-upsell/feature-request/', component: FeatureRequest, name: 'feature.request'},
]
