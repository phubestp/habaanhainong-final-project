package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class UserBanViewController {

    @RequestMapping("/user-ban-view")
    public String getBanUser(Model user){
        ArrayList<HashMap<String,String>> banLists = new ArrayList<>();
        for (int i = 0; i < 2; i++){
            HashMap<String,String> info = new HashMap<>();
            info.put("name", "น้องแมวซุกซน");
           banLists.add(info);
        }
        user.addAttribute("banList", banLists);
        return "user-ban-view";
    }
}
