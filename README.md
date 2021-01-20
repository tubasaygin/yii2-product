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
Bunu yapmak için aşağıdaki komutu çalıştırın: 
 <pre><code>
 composer require --prefer-dist tubasaygin/yii2-products "dev-main"
 </pre></code>
 
Bu işlemi yaptıktan sonra projenizde backend/config klasörü altında main.php dosyanıza modül yolunu verin

 <pre><code>
 'modules' => [
        'products' => [
            'class' => 'tubasaygin\products\Module',
        ],
    ],
    
 </pre></code>
 
 
Bu işlemleri bitirdikten sonra;
  <pre><code>
  vagrant up
  </pre></code>
komutunu çalıştırmalısınız. 

Son olarak veritabanı işlemlerinin de sağlanabilmesi için:
 <pre><code>
 php yii migrate/up --migrationPath=@vendor/tubasaygin/products/migrations  
 </pre></code>

Artık modülü kullanabilirsiniz!

<h3>Modül Tantımı</h3>

Modül, bir ürün yaratırken kullanıcıdan isim, fiyat gibi bilgilerin yanında aynı zamanda tarih ve yüklenecek dosya bilgilerini de ister.
Bu bilgiler alınırken widget kullanılmıştır. Bu widgetları komut yardımıyla projeye eklemeniz gerekebilir:
 <pre><code>
 composer require 2amigos/yii2-date-picker-widget:~1.0
 </pre></code>
 
Bu eklenti sayesinde tarih widgetını hazır bir şekilde kullanabilirsiniz.
Ürünün resmini yüklerken de; indirdiğiniz dosya web altındaki uploads klasörüne kaydedilecektir. Bunun yanında veritabanında da dosyanın konumunu görebilirsiniz. 
Aşağıda bununla alakalı bir ekran görüntüsü görüyorsunuz: 

![Ekran Görüntüsü (111)](https://user-images.githubusercontent.com/70032538/104810722-a4eddf00-5807-11eb-80f9-c84188091ea9.png)

<h2>Controllers</h2>
Controller sınıflarında behaviors() fonksiyonu altında "access" tanımlanmıştır. Böylece kullanıcı giriş yapmadan herhangi bir değişiklik iznine sahip olamamaktadır. 
Aşağıda bununla ilgili bir ekran kaydı görüyorsunuz:

![record](https://user-images.githubusercontent.com/70032538/105158707-539f6180-5b1f-11eb-8b91-f2053ead040b.gif)

Ayrıca ProductController'da actionCreate() fonksiyonu altında düzenlemeler yapılmıştır. Yeni bir çalışan oluşturulduğunda ve fotoğrafı yüklendiğinde bu fotoğraflara veritabanından ulaşabilmenin yanında modül altındaki web/uploads klasöründen de ulaşabilmesi için UploadedFile kullanılmıştır, ve UploadedFile projeye import edilmiştir.

 <pre><code>
 use yii\web\UploadedFile;
 </pre></code>
 
<h2>Views</h2>
Product views'inin içinde çalışanların departmanlarına göre filtrelenebilmesi için ArrayHelper kullanılmıştır. Yukarıda ilk verilen ekran kaydından bu işlemin yapılabildiğini görebilirsiniz...
 
 <pre><code>
 use yii\helpers\ArrayHelper;
 </pre></code>
 
Aynı zamanda product view'inin altında _form.php dosyasında widgetların kullanılabilmesi, upload olaylarının gerçekleşebilmesi için aşağıdaki kod parçası eklenmiştir:

 <pre><code>
 <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
</pre></code>

<h2>Layouts</h2>
Layouts dosyası advanced projesinin altında hazır gelenin haricinde yeni bir tane oluşturulmuştur. Tasarımda komple bir değişiklik yapılmamıştır. Kullanıcı çalışanlara ve departmanlara kolayca ulaşabilmesi için aşağıdaki kod parçası eklenmiştir:

 <pre><code>
 ['label' => 'Products', 'url' => ['/products/product/index']],
 ['label' => 'Categories', 'url' => ['/products/product-category/index']],
 </pre></code>
 
 
