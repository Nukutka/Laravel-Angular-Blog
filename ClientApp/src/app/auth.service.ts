import { Injectable } from '@angular/core';
import { HttpClientModule, HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})

export class AuthService {
  token;

  constructor(private http: HttpClient,private router: Router) { }

  login(email: string, password: string) {
    this.http.post('http://localhost:/api/login', {email: email,password: password})
    .subscribe((resp: any) => {   
      this.router.navigate(['/']);
      localStorage.setItem('access_token', resp.token);    
      })       
    }

    logout() {
      localStorage.removeItem('access_token');
    }

    public get logIn(): boolean {
      return (localStorage.getItem('access_token') !== null);
    }
}
