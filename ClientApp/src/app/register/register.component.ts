import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  email = '';
  password = '';
  name = '';
   
  constructor(private authService: AuthService) { }

  Register() {
    this.authService.register(this.name, this.email, this.password);
  }
 
  ngOnInit() { }
}
