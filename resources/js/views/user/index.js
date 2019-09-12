import UserList from './UserList';
import UserForm from './UserForm';
import UserEdit from './UserEdit';
import Profile from './Profile';

export default [
    {path: '/admin/user/users', component: UserList, name: 'user.index'},
    {path: '/admin/user/create', component: UserForm, name: 'user.create'},
    {path: '/admin/user/:id/edit', component: UserEdit, name: 'user.edit'},
    {path: '/admin/account/profile', component: Profile, name: 'user.profile'},
]