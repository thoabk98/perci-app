import OfferList from './OfferList';
import OfferSetting from './createOffer/OfferSetting';
import OfferCreate from './createOffer/OfferCreate';
import OfferForm from './createOffer/OfferForm';
import TriggerLocation from './createOffer/TriggerLocation';
import OfferNew from './createOffer/OfferNew';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/ult-upsell/offer/settings', component: OfferSetting, name: 'offer.setting'},
    {path: '/ult-upsell/offer/create/step1', component: OfferForm, name: 'offer.create'},
    {path: '/ult-upsell/offer/create/step2', component: TriggerLocation, name: 'offer.trigger'},
    {path: '/ult-upsell/offer/create', component: OfferCreate, name: 'offer.create'},
    {path: '/ult-upsell/offer/new', component: OfferNew, name: 'offer.new'}
]
