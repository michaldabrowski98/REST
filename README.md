# REST
Serwis REST w php który 
1)zwraca nazwy zadanego użytkownika, wyszukiwać użytkownika można przez id,np. dla użytkownika o id 1:
  http://localhost/rest_api/user/read.php?id=1
2)pozwala dodać użytkownika (nazwa i data urodzin w formacie d-m-y). Program przyjmuje i zwraca dane w formacie json. Przykładowo tworzenie użytkownika ma postać:
{
    "name" : "Michał",
    "birthdate" : "05-11-1998"
}
Do obsługi serwisu używałem programu Postman.
