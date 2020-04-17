export class Post {
    constructor (public title:string,public body: string,public category_id: number) {};

    id: number;
    user_id: number;
    created_at: Date;
}