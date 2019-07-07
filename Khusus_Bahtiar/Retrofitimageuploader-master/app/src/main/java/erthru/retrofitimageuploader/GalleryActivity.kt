package erthru.retrofitimageuploader

import android.app.ProgressDialog
import android.content.Intent
import android.support.v7.app.AppCompatActivity
import android.os.Bundle
import android.support.v7.widget.GridLayoutManager
import android.util.Log
import android.view.View
import android.widget.Toast
import erthru.retrofitimageuploader.adapter.RVAdapterGallery
import erthru.retrofitimageuploader.network.ApiConfig
import erthru.retrofitimageuploader.network.responsemodel.Default
import erthru.retrofitimageuploader.network.responsemodel.Gallery
import kotlinx.android.synthetic.main.activity_gallery.*
import retrofit2.Call
import retrofit2.Response

class GalleryActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_gallery)

        // mengubah title pada action bar.
        supportActionBar?.title = "Gallery"

        // setting rvGallery fixed size dan layoutmanager
        rvGallery.setHasFixedSize(true)
        rvGallery.layoutManager = GridLayoutManager(this,2) // menggunakan grid layout manager dengan 2 row

        // memberikan listener onClick pada fabMain, saat diclick maka akan pindah ke activity Upload.
        fabMain.setOnClickListener {

            startActivity(Intent(this,UploadActivity::class.java))

        }

    }

    // override method dari onresume
    override fun onResume() {
        super.onResume()
        loadGallery() // memanggil method load gallery
    }

    // membuat method untuk load gallery
    private fun loadGallery(){

        // init retrofit.
        val call = ApiConfig().instance().gallery()

        // membuat request ke api.
        call.enqueue(object : retrofit2.Callback<Gallery>{

            // handling onfailure method.
            override fun onFailure(call: Call<Gallery>?, t: Throwable?) {
                // pbGallery didismiss
                pbGallery.visibility = View.GONE

                // manampilkan pesan error.
                Toast.makeText(applicationContext,"Connection error",Toast.LENGTH_SHORT).show()
                Log.d("ONFAILURE",t.toString())
            }

            // handling onresponse.
            override fun onResponse(call: Call<Gallery>?, response: Response<Gallery>?) {

                // pbGallery didismiss
                pbGallery.visibility = View.GONE

                // init recyclerview adapter dari RVAdapterGallery.
                val adapter = RVAdapterGallery(this@GalleryActivity, response?.body()?.result!!)
                adapter.notifyDataSetChanged()

                // set adapter ke rvGallery
                rvGallery.adapter = adapter

            }

        })

    }

    // method delete
    fun delete(imageid:String?){

        // manampilkan progress dialog
        val loading = ProgressDialog(this)
        loading.setMessage("Deleting image...")
        loading.show()

        // init retrofit.
        val call = ApiConfig().instance().delete(imageid)
        call.enqueue(object : retrofit2.Callback<Default>{

            // handling request saat fail
            override fun onFailure(call: Call<Default>?, t: Throwable?) {
                loading.dismiss()
                Toast.makeText(applicationContext,"Connection error",Toast.LENGTH_SHORT).show()
                Log.d("ONFAILURE",t.toString())
            }

            // handling request saat response.
            override fun onResponse(call: Call<Default>?, response: Response<Default>?) {

                // dimiss progress dialog
                loading.dismiss()

                // menampilkan pesan yang diambil dari response
                Toast.makeText(applicationContext,response?.body()?.message,Toast.LENGTH_SHORT).show()

                // jika pesan terdapat kata 'success' maka panggil method onresume.
                if(response?.body()?.message?.contains("success",false)!!){
                    onResume()
                }

            }


        })

    }

}
