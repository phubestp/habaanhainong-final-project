package ku.cs.habaanhainong.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import java.util.ArrayList;
import java.util.HashMap;

@Controller
public class UserReportViewController {

    @RequestMapping("/user-report-view")
    public String getReported(Model reported){
        ArrayList<HashMap<String,String>> reportLists = new ArrayList<>();
        for (int i = 0; i < 2; i++){
            HashMap<String,String> info = new HashMap<>();
            info.put("name", "น้องแมวซุกซน");
            info.put("reason", "พฤติกรรมไม่เหมาะสม");
            info.put("date", "2023-08-10");
            reportLists.add(info);
        }
        reported.addAttribute("reportList", reportLists);
        return "user-report-view";
    }
}
