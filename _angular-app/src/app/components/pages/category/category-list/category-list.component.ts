import {Component, OnInit} from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Component({
    selector: 'app-category-list',
    templateUrl: './category-list.component.html',
    styleUrls: ['./category-list.component.css']
})
export class CategoryListComponent implements OnInit {

    categories = [];

    constructor(private http: HttpClient) {
    }

    ngOnInit() {
        this.getCategories();
    }

    getCategories() {
        this.http.get<Array<any>>('http://localhost:8000/api/categories', {
            headers: {
                'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU1MjgzNTIyOSwiZXhwIjoxNTUyODM4ODI5LCJuYmYiOjE1NTI4MzUyMjksImp0aSI6IldvM1lTblFiOWNPQU4zSU0iLCJzdWIiOjEsInBydiI6IjBkZjM4NTQ4ZDU1YmE1ZDMyNTE5ZDgxOGUwZDlhMWU4Y2NkYjVhOGMiLCJuYW1lIjoiR2lsYmVydG8gUmVubmVyIiwiZW1haWwiOiJhZG1pbkB1c2VyLmNvbSJ9.nZ2y4se403_SIHnvYszgjApkPCbEnZ0ogHqPU6evIbI`
            }
        })
            .subscribe(data => this.categories = data);
    }
}
