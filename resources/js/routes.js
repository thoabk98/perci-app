import courseRoutes from './views/course';
import userRoutes from './views/user';
import offerRoutes from './views/offer';
import reportRoutes from './views/report';
import pricingRoutes from './views/pricing';
import helpRoutes from './views/help';

export default [
    ...courseRoutes,
    ...userRoutes,
    ...offerRoutes,
    ...reportRoutes,
    ...pricingRoutes,
    ...helpRoutes,
]
