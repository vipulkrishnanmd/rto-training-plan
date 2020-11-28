import { Injectable } from '@angular/core';
import {
  HttpClient,
  HttpHeaders,
  HttpParams,
  HttpRequest
} from '@angular/common/http';
import { TrainingPlan } from './models/training-plan.interface';
import { Observable } from 'rxjs';
import { tap, map } from 'rxjs/operators';

@Injectable()
export class AppService {
  constructor(private http: HttpClient) {}
  root = './../';
  //root = 'http://localhost/dashboard/trainingplan/public/';

  getTrainingPlan(id): Observable<TrainingPlan> {
    return this.http.get(
      this.root + '?controller=tp&do=getTrainingPlan&id=' + id
    ).pipe(map(x => x[0] || undefined)) as Observable<TrainingPlan>;
  }
}
