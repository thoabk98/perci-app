import OfferList from './OfferList';
import OfferSetting from './createOffer/OfferSetting';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/ult-upsell/offer/settings', component: OfferSetting, name: 'offer.setting'},
]
