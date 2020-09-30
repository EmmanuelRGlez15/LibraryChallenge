import Books from '../modules/Book/Index.vue'
import Categories from '../modules/Category/Index.vue'
import Users from '../modules/User/Index.vue'


export default [
    {
      path: "/books",
      name: "Books",
      component: Books
    },
    {
      path: "/categories",
      name: "Categories",
      component: Categories
    },
    {
      path: "/users",
      name: "Users",
      component: Users
    },
]