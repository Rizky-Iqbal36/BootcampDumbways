#include <stdio.h>

int hitung(int orang){
    int result = 0;
    for(int i = orang-1;i>1;i--){
        result+=i;
    }
    return (result+1);
}
int main()
{
    int n = 0;
    printf("Masukkan berapa banyak orang yang ingin berjabat tangan = ");   scanf("%d",&n);
    printf("\njumlah jabat tangan yang terjadi(berdasarkan kondisi soal) adalah %d",hitung(n));
    return 0;
}
