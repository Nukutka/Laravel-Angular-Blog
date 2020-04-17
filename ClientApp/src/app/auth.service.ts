import { Injectable } from '@angular/core';
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})

export class AuthService {
  token;

  constructor(private http: HttpClient,private router: Router) { }

  public login(email: string, password: string) {
    this.http.post('http://localhost:/api/login', {email: email,password: password})
    .subscribe((resp: any) => {   
      if (resp.success.success) {
        localStorage.setItem('access_token', resp.success.token);  
        localStorage.setItem('user_id', resp.success.user_id);  
        this.router.navigate(['/']);
        console.log("Successfully login.");
      }
      })       
    }

    public logout() {
      localStorage.removeItem('access_token');
      localStorage.removeItem('user_id');
    }

    public get logIn(): boolean {
      return (localStorage.getItem('access_token') !== null);
    }

    public register(name: string, email: string, password: string) {
      this.http.post('http://localhost:/api/register', {name: name, email: email,password: password})
      .subscribe((resp: any) => {   
        if (resp.success) {
          this.router.navigate(['/']);
          console.log("Successfully register.");
        }
        })       
      }
}
