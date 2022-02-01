import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

import { Observable, of, throwError } from 'rxjs';
import { catchError, tap, map } from 'rxjs/operators';

import { Huerto } from '../shared/huerto';

@Injectable({
  providedIn: 'root',
})
export class HuertoService {
  private huertosUrl = 'http://localhost:8000/huertos';

  constructor(private http: HttpClient) {}

  getHuertos(): Observable<Huerto[]> {
    return this.http.get<Huerto[]>(this.huertosUrl).pipe(
      tap((data) => {
        console.log(JSON.stringify(data));
      }),
      catchError(this.handleError)
    );
  }

  getMaxHuertoId(): Observable<number> {
    return this.http.get<Huerto[]>(this.huertosUrl).pipe(
      // Get max value from an array
      map((data) =>
        Math.max.apply(
          Math,
          data.map(function (o) {
            return o.id;
          })
        )
      ),
      catchError(this.handleError)
    );
  }

  getHuertoById(id: number): Observable<Huerto> {
    const url = `${this.huertosUrl}/${id}`;
    return this.http.get<Huerto>(url).pipe(
      tap((data) => console.log('getHuerto: ' + JSON.stringify(data))),
      catchError(this.handleError)
    );
  }

  createHuerto(huerto: Huerto): Observable<Huerto> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    //huerto.id = this.getHuertos.length + 1;
    return this.http
      .post<Huerto>(this.huertosUrl, huerto, { headers: headers })
      .pipe(
        tap((data) => console.log('createHuerto: ' + JSON.stringify(data))),
        catchError(this.handleError)
      );
  }

  deleteHuerto(id: number): Observable<{}> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.huertosUrl}/${id}`;
    return this.http.delete<Huerto>(url, { headers: headers }).pipe(
      tap((data) => console.log('deleteHuerto: ' + id)),
      catchError(this.handleError)
    );
  }

  updateHuerto(huerto: Huerto): Observable<Huerto> {
    const headers = new HttpHeaders({ 'Content-Type': 'application/json' });
    const url = `${this.huertosUrl}/${huerto.id}`;
    return this.http.put<Huerto>(url, huerto, { headers: headers }).pipe(
      tap(() => console.log('updateHuerto: ' + huerto.id)),
      // Return the huerto on an update
      map(() => huerto),
      catchError(this.handleError)
    );
  }

  private handleError(err: any) {
    // in a real world app, we may send the server to some remote logging infrastructure
    // instead of just logging it to the console
    let errorMessage: string;
    if (err.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      errorMessage = `An error occurred: ${err.error.message}`;
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      errorMessage = `Backend returned code ${err.status}: ${err.body.error}`;
    }
    console.error(err);
    return throwError(errorMessage);
  }
}
