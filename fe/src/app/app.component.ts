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

  moveCube(move: string) {
    this.api.call('moveCube', { move: move }).subscribe({
      next: () => {
        this.getCube();
      },
    });
  }

  randCube() {
    this.api.call('randCube').subscribe({
      next: () => {
        this.getCube();
      },
    });
  }

  resetCube() {
    this.api.call('resetCube').subscribe({
      next: () => {
        this.getCube();
      },
    });
  }
}
