type Student = {
    id: string,
    class: number,
    email: string,
    fullName: string,
    parentName: string,
    phone: string
}

type Admin = {

}

type User = Student | Admin

export type {
    Student, 
    Admin,
    User
}