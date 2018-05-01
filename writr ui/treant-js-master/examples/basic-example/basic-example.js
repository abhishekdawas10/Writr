var config = {
        container: "#basic-example",
        
        connectors: {
            type: "step"
        },
        node: {
            HTMLclass: "nodeExample1"
        }
    },
    node_2 = {
        text: {
            name: "2",
            title: "root node ",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_24 = {
        text: {
            name: "24",
            title: "root node ",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_30 = {
        text: {
            name: "30",
            title: "root node ",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_3 = {
        parent: node_2,
        text: {
            name: "3",
            title: "2",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_4 = {
        parent: node_2,
        text: {
            name: "4",
            title: "2",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_5 = {
        parent: node_3,
        text: {
            name: "5",
            title: "3",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_6 = {
        parent: node_5,
        text: {
            name: "6",
            title: "5",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_7 = {
        parent: node_2,
        text: {
            name: "7",
            title: "2",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_26 = {
        parent: node_24,
        text: {
            name: "26",
            title: "24",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_27 = {
        parent: node_26,
        text: {
            name: "27",
            title: "26",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_28 = {
        parent: node_24,
        text: {
            name: "28",
            title: "24",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_29 = {
        parent: node_28,
        text: {
            name: "29",
            title: "28",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_31 = {
        parent: node_30,
        text: {
            name: "31",
            title: "30",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_32 = {
        parent: node_30,
        text: {
            name: "32",
            title: "30",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    node_33 = {
        parent: node_32,
        text: {
            name: "33",
            title: "32",
            contact: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!",
        },
    },
    chart_config = [
		config,
		node_2,
    	node_24,
    	node_30,
    	node_3,
    	node_4,
    	node_5,
    	node_6,
    	node_7,
    	node_26,
    	node_27,
    	node_28,
    	node_29,
    	node_31,
    	node_32,
    	node_33,
    
	    ];