import OfferList from './OfferList';
import OfferCreate from './createOffer/OfferCreate';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/ult-upsell/offer/create', component: OfferCreate, name: 'offer.create'},
]
