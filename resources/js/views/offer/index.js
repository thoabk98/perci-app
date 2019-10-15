import OfferList from './OfferList';
import OfferCreate from './createOffer/OfferCreate';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/admin/offer/create/step1', component: OfferForm, name: 'offer.create'},
    {path: '/admin/offer/create/step2', component: TriggerLocation, name: 'offer.trigger'},
    {path: '/ult-upsell/offer/create', component: OfferCreate, name: 'offer.create'},
]
