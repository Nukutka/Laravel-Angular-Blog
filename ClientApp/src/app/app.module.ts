import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { RouterModule } from '@angular/router';
import { ReactiveFormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { TopBarComponent } from './top-bar/top-bar.component';
import { PostListComponent } from './post-list/post-list.component';

import { HttpClientModule, HTTP_INTERCEPTORS }   from '@angular/common/http';
import { LoginComponent } from './login/login.component';

import { AuthInterceptor } from './authconfig.interceptor';


import { FormsModule }   from '@angular/forms';
import { CreatePostComponent } from './create-post/create-post.component';
import { EditPostComponent } from './edit-post/edit-post.component';
import { RegisterComponent } from './register/register.component';

@NgModule({
  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    RouterModule.forRoot([
      { path: '', component: PostListComponent },
      { path: 'login', component: LoginComponent },
      { path: 'register', component: RegisterComponent },
      { path: 'create_post', component: CreatePostComponent },
      { path: 'edit_post/:id', component: EditPostComponent },
    ]),
    HttpClientModule
  ],
  declarations: [
    AppComponent,
    TopBarComponent,
    PostListComponent,
    LoginComponent,
    CreatePostComponent,
    EditPostComponent,
    RegisterComponent
  ],
  providers: [
    {
      provide: HTTP_INTERCEPTORS,
      useClass: AuthInterceptor,
      multi: true
    }
  ],
  bootstrap: [ AppComponent ]
})
export class AppModule { }


/*
Copyright Google LLC. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/