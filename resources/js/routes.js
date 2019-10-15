import courseRoutes from './views/course';
import userRoutes from './views/user';
import offerRoutes from './views/offer';
import reportRoutes from './views/report';

export default [
    ...courseRoutes,
    ...userRoutes,
    ...offerRoutes,
    ...reportRoutes
]
