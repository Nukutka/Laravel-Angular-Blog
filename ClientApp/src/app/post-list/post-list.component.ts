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
     
    constructor(private httpService: HttpService){}

    ngOnInit(){     
      this.httpService.getPosts().subscribe(data => this.posts=data);
  }
}