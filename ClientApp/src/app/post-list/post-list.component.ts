import { Component } from '@angular/core';
import { Post } from '../models/post';
import { HttpService } from '../data.service';

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  providers: [HttpService],
  styleUrls: ['./post-list.component.css']
})
export class PostListComponent { 
  posts: Post[]=[];
  user_id: number;
     
  constructor(private httpService: HttpService){}

  ngOnInit(){     
    this.httpService.getPosts().subscribe(data => this.posts=data);
    this.user_id = +localStorage.getItem('user_id');
  }

  check(post: Post): boolean {
    return (+localStorage.getItem('user_id') == post.user_id);
  }
}