const OfferList = () => import('@/views/offer/OfferList');
const OfferSetting = () => import('@/views/offer/createOffer/OfferSetting');
const OfferCreate = () => import('@/views/offer/createOffer/OfferCreate');
const OfferForm = () => import('@/views/offer/createOffer/OfferForm');
const TriggerLocation = () => import('@/views/offer/createOffer/TriggerLocation');
const OfferNew = () => import('@/views/offer/createOffer/OfferNew');

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/ult-upsell/offer/settings', component: OfferSetting, name: 'offer.setting'},
    {path: '/ult-upsell/offer/create/step1', component: OfferForm},
    {path: '/ult-upsell/offer/create/step2', component: TriggerLocation, name: 'offer.trigger'},
    {path: '/ult-upsell/offer/create', component: OfferCreate, name: 'offer.create'},
    {path: '/ult-upsell/offer/new', component: OfferNew, name: 'offer.new'}
]
