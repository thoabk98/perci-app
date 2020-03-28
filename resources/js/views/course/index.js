const CourseList = () => import('@/views/course/CourseList');
const CourseForm = () => import('@/views/course/CourseForm');
const CourseEdit = () => import('@/views/course/CourseEdit');

export default [
    {path: '/admin/course/courses', component: CourseList, name: 'course.index'},
    {path: '/admin/course/create', component: CourseForm, name: 'course.create'},
    {path: '/admin/course/:id/edit', component: CourseEdit, name: 'course.edit'},
]