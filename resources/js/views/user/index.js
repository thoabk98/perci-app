const UserList = () => import('@/views/user/UserList');
const UserForm = () => import('@/views/user/UserForm');
const UserEdit = () => import('@/views/user/UserEdit');
const Profile = () => import('@/views/user/Profile');

export default [
    {path: '/admin/user/users', component: UserList, name: 'user.index'},
    {path: '/admin/user/create', component: UserForm, name: 'user.create'},
    {path: '/admin/user/:id/edit', component: UserEdit, name: 'user.edit'},
    {path: '/admin/account/profile', component: Profile, name: 'user.profile'},
]
