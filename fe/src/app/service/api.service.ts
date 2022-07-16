import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root',
})
export class ApiService {
  url = 'http://localhost:8080?&r=';

  headers = {
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded',
    },
  };

  constructor(private http: HttpClient) {}

  call(action: string, argument?: any) {
    let data = {};

    if (argument !== undefined) {
      argument = Object.assign(data, argument);
    }

    return this.http.post(
      this.url + action,
      JSON.stringify(data),
      this.headers
    );
  }
}
