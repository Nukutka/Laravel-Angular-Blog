import { Component, OnInit } from '@angular/core';
import { Category } from '../models/category';
import { HttpService } from '../data.service';

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
     
  constructor(private httpService: HttpService){}

  ngOnInit(){     
    this.httpService.getCategories().subscribe(data => this.categories=data);
  }
}
