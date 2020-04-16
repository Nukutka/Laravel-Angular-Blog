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

    getCategories(){
        return this.http.get<Category[]>('http://localhost/api/categories');
    }
}