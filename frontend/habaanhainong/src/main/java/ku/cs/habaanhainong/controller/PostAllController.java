package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class PostAllController {

    @RequestMapping("/post-all")
    public String getAllPost(Model post){
        ArrayList<HashMap<String,String>> postList  = new ArrayList<>();
        for (int i = 0; i < 2; i++){
            HashMap<String,String> info = new HashMap<>();
            info.put("name", "น้องแมวซุกซน");
            info.put("create", "2023-09-23");
            info.put("header", "หาบ้านให้น้องหน่อยค่ะ เจอน้องอยู่ข้างทางค่ะ");
            info.put("detail", "เจอน้องแถวๆ มอเกษตรค่ะ มีใครพอจะช่วยเลี้ยงน้องๆได้บ้างมั้ยคะ ฮือ สงสารน้อง");
            postList.add(info);
        }
        post.addAttribute("postAllList", postList);
        return "post-all";
    }
}
