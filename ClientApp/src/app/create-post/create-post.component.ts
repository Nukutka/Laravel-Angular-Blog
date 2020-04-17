import { Component, OnInit } from '@angular/core';
import { Category } from '../models/category';
import { Post } from '../models/post';
import { HttpService } from '../data.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-create-post',
  templateUrl: './create-post.component.html',
  styleUrls: ['./create-post.component.css'],
  providers: [HttpService]
})

export class CreatePostComponent implements OnInit {
  title = '';
  body = '';
  selected_category: Category;
  categories: Category[]=[];
     
  constructor(private httpService: HttpService, private router: Router){}

  Create() {
    var post = new Post(this.title, this.body, this.selected_category.id);
    this.httpService.createPost(post).subscribe(created_post => {
      console.log(created_post);
      this.router.navigate(['/']);
    });
  }

  ngOnInit(){     
    this.httpService.getCategories().subscribe(categories => this.categories=categories);
  }
}
