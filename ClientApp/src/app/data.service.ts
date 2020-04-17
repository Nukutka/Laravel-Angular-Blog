import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import { Post } from './models/post';
import { Category } from './models/category';
  
@Injectable()
export class HttpService{
  
    constructor(private http: HttpClient){ }
      
    getPosts(){
        return this.http.get<Post[]>('http://localhost/api/posts');
    }

    getPost(id: number){
        return this.http.get<Post>('http://localhost/api/posts/' + id);
    }

    getCategories(){
        return this.http.get<Category[]>('http://localhost/api/categories');
    }

    createPost(post: Post){
        return this.http.post<Post>('http://localhost:/api/posts', post);
    }

    updatePost(post: Post, id: number){
        return this.http.put<Post>('http://localhost:/api/posts/' + id, post);
    }

    deletePost(id: number){
        return this.http.delete('http://localhost:/api/posts/' + id);
    }
}