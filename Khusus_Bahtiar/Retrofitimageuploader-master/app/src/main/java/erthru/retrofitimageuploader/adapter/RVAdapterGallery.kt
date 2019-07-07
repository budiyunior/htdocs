package erthru.retrofitimageuploader.adapter

import android.content.Context
import android.support.v7.widget.RecyclerView
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import com.bumptech.glide.Glide
import erthru.retrofitimageuploader.GalleryActivity
import erthru.retrofitimageuploader.R
import erthru.retrofitimageuploader.network.ApiConfig
import erthru.retrofitimageuploader.network.datamodel.Image
import erthru.retrofitimageuploader.network.responsemodel.Gallery
import kotlinx.android.synthetic.main.list_gallery.view.*

// passing activity dan arraylist lewat constructor, kemudian extends class dari recyclerview adapter.
class RVAdapterGallery(private val context: GalleryActivity, private val arrayList: ArrayList<Image>) : RecyclerView.Adapter<RVAdapterGallery.Holder>() {

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): Holder {

        // init view dari list_gallery.xml ke dalam adapter
        return Holder(LayoutInflater.from(parent.context).inflate(R.layout.list_gallery,parent,false))

    }

    // return nilai dari arraylist
    override fun getItemCount(): Int = arrayList.size

    override fun onBindViewHolder(holder: Holder, position: Int) {

        // tampilkan gambar dengan library glide pada view imgList
        Glide.with(context).load(ApiConfig.IMAGE_URL+arrayList.get(position).imagename).into(holder.view.imgList)

        // membuat onclick listener pada image
        holder.view.imgList.setOnClickListener {

            //saat image diclick maka akan menampilkan delete confirmation dialog pada image.
            holder.view.frameClickList.visibility = View.VISIBLE

        }

        // saat pilihan 'NO' diclick maka view/dialog confirmation tadi di dismiss.
        holder.view.lbNoList.setOnClickListener {

            holder.view.frameClickList.visibility = View.GONE

        }

        // saat pilihan 'YES' diclick maka data akan dihapus
        holder.view.lbYesList.setOnClickListener {

            // mamanggil method delete dari class GalleryActivity
            context.delete(arrayList.get(position).imageid)

        }

    }

    // class holder yang dipakai untuk init view dari list_gallery.xml.
    class Holder(val view:View) : RecyclerView.ViewHolder(view)

}