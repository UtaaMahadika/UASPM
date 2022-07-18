import 'tambah.dart';
import 'edit.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:flutter/rendering.dart';

void main() {
  runApp(MaterialApp(
    home: HomePage(),
  ));
}

class HomePage extends StatefulWidget {
  @override
  _HomePageState createState() => _HomePageState();
}

class _HomePageState extends State<HomePage> {
  List _get = [];
  @override
  void initState() {
    // TODO: implement initState
    super.initState();
    _getData();
  }

  Future _getData() async {
    try {
      final response =
          await http.get(Uri.parse("http://192.168.1.4/uas/list.php"));
      if (response.statusCode == 200) {
        final data = jsonDecode(response.body);

        // entry data to variabel list _get
        setState(() {
          _get = data;
        });
      }
    } catch (e) {
      print(e);
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Aplikasi Data Dosen'),
        actions: [
          Container(
            padding: EdgeInsets.only(right: 20),
            child: ElevatedButton(
              onPressed: () {
                Navigator.push(
                    context,
                    MaterialPageRoute(builder: (context) {
                      return tambah();
                    })
                );
              },
              child: Icon(Icons.add),
            ),
          )
        ],
      ),
      body: ListView.builder(
        itemCount: _get.length,
        itemBuilder: (context, index) {
          return Padding(
              padding: const EdgeInsets.only(
              top: 20,
          ),
            child: ListTile(
              onTap: (){
                Navigator.push(
                    context,
                    //routing into edit page
                    //we pass the id note
                    MaterialPageRoute(builder: (context) => edit(nip: _get[index]['nip'],)));
              },
              title: Text(
                //menampilkan data judul
                '${_get[index]['nama']}',
                maxLines: 1,
                overflow: TextOverflow.ellipsis,
              ),
              subtitle: Text(
                '${_get[index]['nip']}',
                maxLines: 1,
                overflow: TextOverflow.ellipsis,
              ),
            ),
          );
        },
      ),
    );
  }
}
