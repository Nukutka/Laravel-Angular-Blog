import { Component, OnInit } from '@angular/core';
import { Category } from '../models/category';
import { Post } from '../models/post';
import { HttpService } from '../data.service';
import { Router, ActivatedRoute } from '@angular/router';
import {Subscription} from 'rxjs';

@Component({
  selector: 'app-edit-post',
  templateUrl: './edit-post.component.html',
  styleUrls: ['./edit-post.component.css'],
  providers: [HttpService]
})
export class EditPostComponent implements OnInit {
  private subscription: Subscription;
  post_id: number;
  title = '';
  body = '';
  selected_category: Category;
  categories: Category[]=[];

  constructor(private httpService: HttpService, private router: Router, private activateRoute: ActivatedRoute) {
    this.subscription = activateRoute.params.subscribe(params=>this.post_id=params['id']);
  }

  ngOnInit(): void {
    this.httpService.getCategories().subscribe(categories => {
      this.categories=categories;
      this.httpService.getPost(this.post_id).subscribe(post => {
        this.title = post.title;
        this.body = post.body;
        this.selected_category = this.categories.find(c => c.id == post.category_id);
      });
    });
  }

  Update() {
    var post = new Post(this.title, this.body, this.selected_category.id);
    this.httpService.updatePost(post, this.post_id).subscribe(updated_post => {
      console.log(updated_post);
      this.router.navigate(['/']);
    });
  }

  Delete() {
    this.httpService.deletePost(this.post_id).subscribe(data => {
      console.log("deleted");
      this.router.navigate(['/']);
    });
  }

}
