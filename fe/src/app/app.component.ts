import { Component } from '@angular/core';
import { ApiService } from './service/api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss'],
})
export class AppComponent {
  title = 'Rubik';
  cube: any = [];

  constructor(private api: ApiService) {
    this.getCube();
  }

  getCube() {
    this.api.call('getCube').subscribe({
      next: (data: any) => {
        this.cube = data;
      },
    });
  }
}
