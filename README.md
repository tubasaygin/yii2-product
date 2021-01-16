<h1> Products Modülü: </h1>

Bu modül, ürün yaratma, ürünleri kategorize etme, silme ve düzenleme işlemlerini yapabilmek
için yazılmıştır.

![record](https://user-images.githubusercontent.com/70032538/104810148-e67c8b00-5803-11eb-9f6f-34347ac88c24.gif)


- Modül, iki tablodan oluşmaktadır. Bunlar; product ve product_category tablolarıdır. Tablolar birbirine foreign key ile bağlıdır.
- Modül ürünleri filtreleme işlemlerini gerçekleştirmektedir. Bunu yaparken de product_category tablosunu kullanır.
- Filtreleme işleminin yanında, ürün ekleme, silme, güncelleme ve yeni bir kategori ekleme, silme, güncelleme işlemlerini yapabilmektedir.

<h3> KURULUM </h3>
<hr>

Modülü packagist.org sayfasında yeni bir depo olarak oluşturup projenize ekleyerek kullanabilirsiniz. 
Bunu yapmak için packagist işlemini tamamladıktan sonra aşağıdaki komutu çalıştırın: 
 <pre><code>
 composer require --prefer-dist tubasaygin/yii2-products "dev-main"
 </pre></code>
 
 
