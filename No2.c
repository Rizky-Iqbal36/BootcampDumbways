#include <stdio.h>
#include <stdlib.h>
#include <time.h>
int generate(char *key){
    int x = 0;
    for(int i = 1;i<=19;i++){
        if(i%5==0){
            printf("-");
        }
        else{
            x = rand()%35;
            printf("%c",key[x]);
        }
    }
}
int main()
{
    srand(time(NULL));//membuat waktu dalam world berjalan
    int gen = 0;
    char key [35] ={};
    //inisialisasi setiap indeks dengan char berupa angka(0-9) dan huruf(a-z[huruf kecil]) (menggunakan ascii)
    for(int i = 0;i<35;i++){
        if(i>=9){
            key[i] = i+88;
        }
        else{
            key[i] = i+48;
        }
        //cek inisialisasi
        //printf("%c\n",key[i]);
    }
    printf("Mau generate berapa banyak? = ");   scanf("%d",&gen);
    for(int y = 0;y<gen;y++)
    {
        generate(key);
        printf("\n");
    }
    return 0;
}

