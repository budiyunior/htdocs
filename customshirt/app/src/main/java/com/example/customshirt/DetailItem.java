package com.example.customshirt;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.DeadObjectException;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.cepheuen.elegantnumberbutton.view.ElegantNumberButton;
import com.example.customshirt.Model.Desain.PostDesainSaya;
import com.example.customshirt.Model.Desain.PostPutDelDesainPengguna;
import com.example.customshirt.Model.DetailKeranjang.PostDetailCart;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Rest.ApiInterface;
import com.nex3z.togglebuttongroup.SingleSelectToggleGroup;
import com.nex3z.togglebuttongroup.button.CircularToggle;
import com.squareup.picasso.Picasso;


import java.util.UUID;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class DetailItem extends AppCompatActivity implements View.OnClickListener {

    TextView tvNama, tvHarga, tvDeskripsi,tvNamaDesain;
    SharedPreferences sharedPreferences;
    ElegantNumberButton jumlah_item;
    SingleSelectToggleGroup single;

    Spinner spinner;
    private KeranjangFragment keranjangFragment;
    private Button btn_masukcart;
    ApiInterface mApiInterface;
    private Spref spref;
    private RadioGroup radioSize;
    private RadioButton radioBtnSize;
    private Button btnDisplay;
    private String selectedId;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_item);

        tvNama = findViewById(R.id.tvNama);
        tvNamaDesain = findViewById(R.id.txt_nama_desain);
        tvHarga = findViewById(R.id.tvHarga);
        tvDeskripsi = findViewById(R.id.tvDeskripsi);
        spinner=(Spinner)findViewById(R.id.ukuran);
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.ukuran, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinner.setAdapter(adapter);


//        single = (SingleSelectToggleGroup) findViewById(R.id.radioSize);
//        single.setOnCheckedChangeListener(new SingleSelectToggleGroup.OnCheckedChangeListener() {
//            @Override
//            public void onCheckedChanged(SingleSelectToggleGroup group, int checkedId) {
//                int selectedId = single.getCheckedId();
//
//                // find the radiobutton by returned id
//                select = () findViewById(selectedId);
//
//                Toast.makeText(MyAndroidAppActivity.this,
//                        radioButton.getText(), Toast.LENGTH_SHORT).show();
//            }
//        });


        jumlah_item = (ElegantNumberButton) findViewById(R.id.jumlah_item);

        Intent mIntent = getIntent();

        Bundle bd = mIntent.getExtras();

        tvNama.setText( mIntent.getStringExtra("Nama"));
        tvHarga.setText( mIntent.getStringExtra("Harga"));
//        tvDeskripsi.setText(mIntent.getStringExtra("Deskripsi"));
//        String id_item = (String) bd.get("Id_item");
        if(bd != null)
        {
            String id_item = (String) bd.get("Id_item");
            String getName = (String) bd.get("Nama");
            String gambar = (String) bd.get("Gambar");
            Log.e("Berhasil", "berhasil"+id_item+getName+gambar);
//            txtView.setText(getName);
            String harga_satuan = (String) bd.get("Harga");
            String berat_satuan = (String) bd.get("Berat");
            Log.e("Berhasil", "berhasil"+harga_satuan+berat_satuan);
        }
//        String id_item = (String) bd.get("Id_item");

        ImageView image_item= (ImageView) findViewById(R.id.image_item);
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        String imageUri = "http://192.168.43.153/adigagas/assets/profil/"+mIntent.getStringExtra("Gambar");
        Picasso.with(this).load(imageUri).into(image_item);
        Log.e("Berhasil", "berhasil"+imageUri);
//        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_pengguna =sharedPreferences.getString("id_pengguna","0");
//        String nama_pengguna=sharedPreferences.getString("nama_pengguna","2");

//        spref = new Spref(this);
//
//        String id_pengguna = spref.getSP_id_pengguna();

        btn_masukcart = (Button) findViewById(R.id.btn_masukcart);
        btn_masukcart.setOnClickListener(this);
        String uniqueID = UUID.randomUUID().toString();

        RadioGroup radioGroup = (RadioGroup)findViewById(R.id.radioSize);
//        RadioGroup.setOnClickListener(new View.OnClickListener() {
////            @Override
////            public void onClick(View v) {
////                // Get the checked Radio Button ID from Radio Grou[
////                int selectedRadioButtonID = rg.getCheckedRadioButtonId();
////
////                // If nothing is selected from Radio Group, then it return -1
////                if (selectedRadioButtonID != -1) {
////
////                    RadioButton selectedRadioButton = (RadioButton) findViewById(selectedRadioButtonID);
////                    String selectedRadioButtonText = selectedRadioButton.getText().toString();
////
////                    tv_result.setText(selectedRadioButtonText + " selected.");
////                }
////                else{
////                    tv_result.setText("Nothing selected from Radio Group.");
////                }
////            }
////        });
//
    }
    public void PostDesain() {
        spref = new Spref(this);
        String id_pengguna = spref.getSP_id_pengguna();
        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_desain = ;
        String id_detail_cart = UUID.randomUUID().toString();
        Intent mIntent = getIntent();
        Bundle bd = mIntent.getExtras();
        String id_item = (String) bd.get("Id_item");
        String harga_satuan = (String) bd.get("Harga");
        String berat_satuan = (String) bd.get("Berat");
        Double harga_satuan2 = Double.parseDouble(harga_satuan);
        Double berat_satuan2 = Double.parseDouble(berat_satuan);
        String tvHargaOld = jumlah_item.getNumber();
        Double tvHargaNew = Double.parseDouble(tvHargaOld);
        String tvHargaOld2 = jumlah_item.getNumber();
        Double tvHargaNew2 = Double.parseDouble(tvHargaOld2);
        final Double subHarga = harga_satuan2 * tvHargaNew2;
        final Double subBerat = berat_satuan2 * tvHargaNew;
        Log.e("Berhasil", "berhasil desain cart"+harga_satuan+berat_satuan);
        Call<PostPutDelDesainPengguna> postDesain = mApiInterface.postDesainPengguna(UUID.randomUUID().toString(),id_pengguna,null,
                id_item,tvNamaDesain.getText().toString(),spinner.getSelectedItem().toString(),null,jumlah_item.getNumber(),subBerat.toString()
                ,subHarga.toString());
        postDesain.enqueue(new Callback<PostPutDelDesainPengguna>() {
            @Override
            public void onResponse(Call<PostPutDelDesainPengguna> call, Response<PostPutDelDesainPengguna> response) {
                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
                Log.e("Berhasil", "berhasil desain cart"+subBerat+subHarga+jumlah_item.getNumber());
//                finish();
            }
            @Override
            public void onFailure(Call<PostPutDelDesainPengguna> call, Throwable t) {
                Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
            }
        });
    }

    public void PostDesainSaya() {
        spref = new Spref(this);
        String id_pengguna = spref.getSP_id_pengguna();
        sharedPreferences = getSharedPreferences("remember", Context.MODE_PRIVATE);
//        String id_desain = ;
        String id_detail_cart = UUID.randomUUID().toString();
        Intent mIntent = getIntent();
        Bundle bd = mIntent.getExtras();
        String id_item = (String) bd.get("Id_item");
        final String harga_satuan = (String) bd.get("Harga");
        final String berat_satuan = (String) bd.get("Berat");
        Log.e("Berhasil", "sukses desain saya"+harga_satuan+berat_satuan);
        Call<PostDesainSaya> postDesain = mApiInterface.postDesainSaya(UUID.randomUUID().toString(),id_pengguna,id_item,
                tvNamaDesain.getText().toString(),spinner.getSelectedItem().toString(),null,berat_satuan
                ,harga_satuan);
        postDesain.enqueue(new Callback<PostDesainSaya>() {
            @Override
            public void onResponse(Call<PostDesainSaya> call, Response<PostDesainSaya> response) {
                Toast.makeText(getApplicationContext(), "Berhasil ditambahkan", Toast.LENGTH_LONG).show();
                Log.e("Sukses", "sukses desain saya"+berat_satuan+harga_satuan+jumlah_item.getNumber());
//                finish();
            }

            @Override
            public void onFailure(Call<PostDesainSaya> call, Throwable t) {
                Toast.makeText(getApplicationContext(), "Error", Toast.LENGTH_LONG).show();
            }
        });

    }

    @Override
    public void onClick(View v) {
        if (v == btn_masukcart){
           PostDesain();
           PostDesainSaya();

        }


    }


}
