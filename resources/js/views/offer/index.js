import OfferList from './OfferList';

export default [
    {path: '/ult-upsell/offer', component: OfferList, name: 'offer.index'},
    {path: '/admin/offer/create/step1', component: OfferForm, name: 'offer.create'},
    {path: '/admin/offer/create/step2', component: TriggerLocation, name: 'offer.trigger'},
]
