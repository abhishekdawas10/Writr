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
    chart_config = [
		config,
		node_2,
    	node_3,
    	node_4,
    	node_5,
    	node_6,
    	node_7,
    
	    ];