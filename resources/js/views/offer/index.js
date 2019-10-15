import OfferList from './OfferList';
import OfferSetting from './createOffer/OfferSetting';
import OfferCreate from './createOffer/OfferCreate';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/ult-upsell/offer/settings', component: OfferSetting, name: 'offer.setting'},
    {path: '/admin/offer/create/step1', component: OfferForm, name: 'offer.create'},
    {path: '/admin/offer/create/step2', component: TriggerLocation, name: 'offer.trigger'},
    {path: '/ult-upsell/offer/create', component: OfferCreate, name: 'offer.create'},
]
